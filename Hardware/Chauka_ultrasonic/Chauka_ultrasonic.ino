//define Pins
int pump = 9;
int trigPin = 11;
int echoPin = 12;


// defines variables
long duration;
int distance;

void setup() {
  //Sets the Led as an Output
  pinMode(pump, OUTPUT);

  // Sets the trigPin as an Output
  pinMode(trigPin, OUTPUT);

  // Sets the echoPin as an Input
  pinMode(echoPin, INPUT);

  // Starts the serial communication
  Serial.begin(9600);
}

void loop() {
  // Clears the trigPin
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);

  // Sets the trigPin on HIGH state for 10 micro seconds
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);

  // Reads the echoPin, returns the sound wave travel time in microseconds
  duration = pulseIn(echoPin, HIGH);

  // Calculating the distance
  distance = duration * 0.034 / 2;

  // Prints the distance on the Serial Monitor
  Serial.print("Distance: ");
  Serial.println(distance);

  if (distance >= 16) { // Change Distance according to Ultrasonic Sensor Placement
    digitalWrite (pump , HIGH );
  }
  else if (distance <= 5) {
    digitalWrite (pump, LOW );
  }
}
