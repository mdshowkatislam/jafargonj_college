<style>
    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #ffffff;
        /* background: rgba(0,0, 0, 0.8);
        backdrop-filter: blur(5px); */
        z-index: 9999;
        transition: height 0.5s ease-in-out;
    }

    #loader {
        position: absolute;
        top: 48%;
        left: 48%;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #179bd7;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<!-- Preloader -->
<div id="preloader">
    <div id="loader"></div>
</div>
<script>
    window.addEventListener("load", function() {
        var loader = document.getElementById("loader");
        loader.style.display = "none"; // Hide the loader

        setTimeout(function() {
            var preloader = document.getElementById("preloader");
            preloader.style.display = "none"; 
        }, 300); // Delay the animation for 300 milliseconds
    });
</script>
