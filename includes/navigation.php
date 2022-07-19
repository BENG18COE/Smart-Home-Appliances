<style>
    .mobile-nav {
        z-index: 9999;
        background: #fff;
        box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
        flex: 1 1 auto;
        border-radius: 10px;
        position: fixed;
        bottom: 0;
        height: 65px;
        width: 100%;
        display: flex;
        justify-content: space-around;
    }

    .bloc-icon {
        /* display: flex;   */
        justify-content: center;
        align-items: center;
    }

    .mobile-nav i {
        font-size: xx-large;
        font-weight: bold;
        color: #3361ff!important;
        transition: 0.4s ease-in-out;
    }

    .mobile-nav i:hover {
        font-size: 25px;
        font-weight: bold;
        color: blue !important;
        transition: 0.4s ease-in-out;
    }

    .mobile-nav span {
        color: black;
    }


    @media screen and (min-width: 600px) {
        .mobile-nav {
            display: none;
        }
    }
</style>

<section class="text-center">
    <nav class="mobile-nav">
        <a href="./" class="bloc-icon">
            <i class="bi bi-house"></i>
            <div>
                <span>Home</span>
            </div>
        </a>
        <a href="report.php" class="bloc-icon">
            <i class="bi bi-droplet"></i>
            <div>
                <span>Report</span>
            </div>
        </a>
        <a href="https://wa.me/255763754183" class="bloc-icon">
            <i class="bi bi-telephone"></i>
            <div>
                <span>Support</span>
            </div>
        </a>
        <a href="profile.php" class="bloc-icon">
            <i class="bi bi-person"></i>
            <div>
                <span>Profile</span>
            </div>
        </a>
        <a href="#" class="bloc-icon">
            <img src="ressources/user.svg" alt="">
        </a>
    </nav>
</section>