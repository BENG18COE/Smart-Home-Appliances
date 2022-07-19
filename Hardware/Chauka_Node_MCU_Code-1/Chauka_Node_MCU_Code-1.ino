#include <ArduinoJson.h>
#include <Arduino.h>
#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>

StaticJsonDocument<256> jsonBuffer;

// WiFi parameters
//const char* ssid = "ChaukaJr";
//const char* password = "kijiko10";

const char* ssid = "Ethan";
const char* password = "12345678...";


//Naming the HTTPClient as http
HTTPClient http;

//Naming the WifiClient as client
WiFiClient client;


// Defining the Appliances Varibles
int bulb1Low = D0;
int bulb1High = D1;
int bulb2 = D2;
int waterValve = D5;
int waterPump = D6;
int fanHigh = D3;
int fanLow = D4;

//Flow Sensor values
int SENSOR = D7;

// The hall-effect flow sensor outputs approximately 4.5 pulses per second per
long currentMillis = 0;
long previousMillis = 0;
int interval = 1000;

float calibrationFactor = 4.5;
volatile byte pulseCount;
byte pulse1Sec = 0;
float flowRate;
unsigned int flowMilliLitres;
unsigned long totalMilliLitres;


//User Id
String userId = "achauka06@gmail.com";

//Host to get data
const String host = "http://94.237.90.88/chauka/Getstatus.php?user_id=" + userId;


void IRAM_ATTR pulseCounter()
{
  pulseCount++;
}


void todayWaterUsage(float totalLitres) {
  float litres = totalLitres;

  //Host to get data
  const String host = "http://94.237.90.88/chauka/Poststatus.php?user_id=" + userId + "&water_usage=" + litres;

  http.begin(client, host);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  
  int httpCode = http.GET();
  delay(500);
  http.end();
}


void setup() {
  //Set the devices to OFF by default
  digitalWrite(waterPump, HIGH);
  digitalWrite(bulb1Low, HIGH);
  digitalWrite(bulb1High, HIGH);
  digitalWrite(bulb2, HIGH);
  digitalWrite(fanLow, HIGH);
  digitalWrite(fanHigh, HIGH);
  digitalWrite(waterPump, HIGH);
  digitalWrite(waterValve, HIGH);

  //  Initiate Serial Communication at Baud rate of 9600
  Serial.begin(9600);

  pinMode(bulb1High, OUTPUT);
  pinMode(bulb1Low, OUTPUT);
  pinMode(bulb2, OUTPUT);
  pinMode(waterValve, OUTPUT);
  pinMode(waterPump, OUTPUT);
  pinMode(fanHigh, OUTPUT);
  pinMode(fanLow, OUTPUT);

  //Flow Sensor
  pinMode(SENSOR, INPUT_PULLUP);
  pulseCount = 0;
  flowRate = 0.0;
  flowMilliLitres = 0;
  totalMilliLitres = 0;
  previousMillis = 0;
  attachInterrupt(digitalPinToInterrupt(SENSOR), pulseCounter, FALLING);

  //  Begin Connecting to Wifi with the given ssid and password
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);

  Serial.println("Connecting");

  //  Checking wether the Device is connected to Network
  while (WiFi.status() != WL_CONNECTED) {
    delay(100);
    Serial.print(".");
  }

  delay(3000);
  Serial.println("WiFi connected");
  Serial.println("IP address: ");

  //  Printing the Local IP of the Device
  Serial.println(WiFi.localIP());
}


void loop() {
  //  Begin of flow Sensor work
  currentMillis = millis();
  if (currentMillis - previousMillis > interval) {
    pulse1Sec = pulseCount;
    pulseCount = 0;
    flowRate = ((1000.0 / (millis() - previousMillis)) * pulse1Sec) / calibrationFactor;
    previousMillis = millis();
    flowMilliLitres = (flowRate / 60) * 1000;
    totalMilliLitres += flowMilliLitres;
  }

  Serial.print("Output Liquid Quantity: ");
  float totalLitres = totalMilliLitres / 1000.0;
  Serial.print(totalLitres);
  Serial.println("L");

  //  Begin of HTTP Process
  //  Functtion to uodate water usage
 todayWaterUsage(totalLitres);
  
  http.begin(client, host);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");

  int httpCode = http.GET();
  String payload = http.getString(); // get data from webhost continously

  Serial.println(payload);

  DeserializationError error = deserializeJson(jsonBuffer, payload);

  // Test if parsing succeeds.
  if (error) {
    Serial.print(F("deserializeJson() failed: "));
    Serial.println(error.f_str());
    return;
  }

  //  Fetching data
  int bulb1Status = jsonBuffer["bulb1_status"];
  int bulb1State = jsonBuffer["bulb1_state"];
  int bulb2Status = jsonBuffer["bulb2_status"];
  int waterValve_status = jsonBuffer["waterValve_status"];
  int waterPump_status = jsonBuffer["waterPump_status"];
  int fan_status = jsonBuffer["fan_status"];
  int fan_speed = jsonBuffer["fan_speed"];


  //Control Bulb1
  if (bulb1Status == 1) // if data == 1 -> LED ON
  {
    if (bulb1State == 2) {
      digitalWrite(bulb1High, LOW);
      digitalWrite(bulb1Low, HIGH);
    } else {
      digitalWrite(bulb1Low, LOW);
      digitalWrite(bulb1High, HIGH);
    }
  } else {
    digitalWrite(bulb1High, HIGH);
    digitalWrite(bulb1Low, HIGH);
  }



  //  Control bulb2
  if (bulb2Status == 1) // if data == 1 -> LED ON
  {
    digitalWrite(bulb2, LOW);
  }
  else if (bulb2Status == 0) // if data == 0 -> LED OFF
  {
    digitalWrite(bulb2, HIGH);
  }



  //  Control WaterValve
  if (waterValve_status == 1) // if data == 1 -> LED ON
  {
    digitalWrite(waterValve, LOW);
  }
  else if (waterValve_status == 0) // if data == 0 -> LED OFF
  {
    digitalWrite(waterValve, HIGH);
  }



  //  Override waterPump
  if (waterPump_status == 1) // if data == 1 -> LED ON
  {
    digitalWrite(waterPump, LOW);
  }
  else if (waterPump_status == 0) // if data == 0 -> LED OFF
  {
    digitalWrite(waterPump, HIGH);
  }


  //Control Fan speed
  if (fan_status == 1) // if data == 1 -> LED ON
  {
    if (fan_speed == 2) {
      digitalWrite(fanHigh, LOW);
      digitalWrite(fanLow, HIGH);
    }
    else {
      digitalWrite(fanHigh, HIGH);
      digitalWrite(fanLow, LOW);
    }
  }

  else if (fan_status == 0) // if data == 0 -> LED OFF
  {
    digitalWrite(fanHigh, HIGH);
    digitalWrite(fanLow, HIGH);
  }

  delay(500);
  http.end();
}
