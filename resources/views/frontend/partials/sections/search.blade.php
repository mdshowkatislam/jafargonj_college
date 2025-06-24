<section>
    <div class="container my-5">
        <div class="row rounded" style="height:11rem; background-color: #f1f1f1">
            <div class="col-md-4 d-block my-auto justify-content-center align-items-center">
                <h3 class="text-uppercase fs-4">{{ $page_title }} SEARCH</h3>
                <p>Use the filters to find {{ $page_title }}!</p>
            </div>
            <div class="col-md-8 my-auto justify-content-center">
                <div class="input-group" style="height : 60px;">
                    <input type="search" class="form-control search-box" placeholder="Enter Keywords ..."
                        aria-label="Search" id="input-field" aria-describedby="search-addon"
                        style="border-radius: 0; font-size: 20px; background-color: #00c5bf; border: none;" />
                    <span class="input-group-text" id="search-addon"
                        style="width : 50px; cursor: pointer; border-radius: 0; background-color: #00c5bf">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const searchInput = document.getElementById('input-field');

    searchInput.addEventListener('input', () => {
        const dataList = document.querySelectorAll('.content-title');
        const searchTerm = searchInput.value;

        for (let i = 0; i < dataList.length; i++) {
            const itemText = dataList[i].textContent;
           // console.log(itemText);
            if ((itemText.toLowerCase()).includes((searchTerm.toLowerCase()))) {
                const result = [...itemText.matchAll(new RegExp(searchTerm, 'gi'))];
                var textsplit = itemText.split(new RegExp(searchTerm, 'gi'));
                var text = '';
                const textsplit_length = textsplit.length;
                for (let i = 0; i < textsplit_length; i++) {
                    if ((textsplit_length - 1) == i) {
                        text += textsplit[i];
                    } else {
                        text += textsplit[i] + "<span class='text-danger text-bold'>" + result[i]['0'] +
                            "</span>";
                    }
                }
                dataList[i].childNodes[1].innerHTML = text;

                dataList[i].parentNode.parentNode.parentNode.style.display = 'block';
            } else {
                dataList[i].parentNode.parentNode.parentNode.style.display = 'none';
            }
        }
    });
</script>
