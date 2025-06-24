function openNav() {
  document.getElementById("mySidenav").style.width = "350px";
}
/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
$(document).ready(function () {
  $("#flip").click(function () {
    $("#panel").slideToggle("slow");
  });

  // AOS.init();
});
//* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

/*Scroll to top when arrow up clicked BEGIN*/
$(window).scroll(function () {
  var height = $(window).scrollTop();
  if (height > 100) {
    $("#back2Top").fadeIn();
  } else {
    $("#back2Top").fadeOut();
  }
});
$(document).ready(function () {
  $("#back2Top").click(function (event) {
    event.preventDefault();
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      "slow"
    );
    return false;
  });
});
/*Scroll to top when arrow up clicked END*/
AOS.init({
  duration: 1200,
});
$(document).mouseup(function (e) {
  var container = $("#web-search-div");
  if (!container.is(e.target) && container.has(e.target).length === 0) {
    if ($(".top-search").is(":visible")) {
      $(".top-search").slideUp();
    }
  }
});

$("a.showMore").click(function () {
  $(".shortBiography").hide();
  $(".more").show();
});
$("a.lessNow").click(function () {
  $(".shortBiography").show();
  $(".more").hide();
});
