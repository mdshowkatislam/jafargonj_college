
<h3 class="fs-5 fw-bold border-bottom p-1 common-font-color custom-font-titillium-web">About
    {{ @$faculty->name }}
</h3>

<div class="text-justify fs-6 custom-font-titillium-web about-text-container" style="overflow: hidden; max-height: 13rem;">
    <span class="custom-font-titillium-web about-text">{!! @$faculty->about !!}</span>
</div>

<a href="{{ route('faculty_message', $faculty->id) }}" class="ms-1 fw-bold text-dark custom-font-titillium-web read-more" style="display: none;">Read More</a>

<script>
    function checkOverflow() {
        const textContainer = document.querySelector('.about-text-container');
        const readMoreLink = document.querySelector('.read-more');

        // Check if the text overflows
        if (textContainer.scrollHeight > textContainer.clientHeight) {
            readMoreLink.style.display = 'inline'; // Show "Read More" link
            textContainer.style.overflow = 'hidden'; // Hide overflow text
        } else {
            readMoreLink.style.display = 'none'; // Hide "Read More" link if no overflow
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        checkOverflow(); // Initial check on load
    });

    window.addEventListener('resize', function() {
        checkOverflow(); // Check on window resize
    });
</script>