document.addEventListener('DOMContentLoaded', async () => {
    // Đổ danh sách sản phẩm
    _init();
    // Đổ danh sách categories
    _getCategories();
})

async function _init() {
    var items = await Helper.fetchData("product")
    showProducts(items)
    // Thêm sự kiện lọc giá khi bấm lọc
    document.querySelector(".price-range-area .text-uppercase").addEventListener('click', () => filterBy())
    document.querySelector(".shop_sidebar_searchbar i").addEventListener('click', () => filterBy())
}

async function _getCategories() {
    var items = await Helper.fetchData(`category`)
    var categories = document.querySelector(".blog_category_item .form-check")
    categories.innerHTML = ""
    items.forEach(item => {
        var category = document.createElement("div");
        category.classList.add("col");
        category.innerHTML = `
            <input class="form-check-input" type="checkbox" value="" id="_categoryID${item.ID}">
            <label class="form-check-label ms-2" for="_categoryID${item.ID}">
                ${item.Name}
            </label>
        `
        categories.appendChild(category)
    });
}

async function filterBy() {
    document.querySelectorAll("#grid_layout .row.g-4 .col-sm-6").forEach(item => {
        if (
            byPrice(item.querySelector(".sale_price"))
            && byName(item.querySelector(".product_title a").textContent)
        ) {
            item.classList.remove("d-none")
        } else {
            item.classList.add("d-none")
        }
    })

    // Lọc theo giá
    function byPrice(value) {
        var str = document.querySelector("#amount").value;
        var cleanedStr = str.replace(/₫/g, '');
        var parts = cleanedStr.split(' - ');
        var minValue = parseFloat(parts[0].replace(/\./g, '').replace(/,/g, '.'));
        var maxValue = parseFloat(parts[1].replace(/\./g, '').replace(/,/g, '.'));
        value = parseFloat(value.textContent.replace(/\./g, '').replace(/,/g, '.'))
        if ((value < minValue) || (value > maxValue)) {
            return false
        } else {
            return true
        }
    }

    // Lọc theo tên
    function byName(name) {
        var nameValue = document.querySelector(".shop_sidebar_searchbar input").value
        if (name.toLowerCase().includes(nameValue.toLowerCase())) {
            return true
        } else {
            return false
        }
    }

}

async function showProducts(items) {
    var dataList = document.querySelector("#grid_layout .row.g-4")
    var data = document.querySelector("#grid_layout .row.g-4 .col-sm-6").cloneNode(true)
    dataList.innerHTML = ""
    await items.forEach(item => {
        let cloneData = data.cloneNode(true)
        cloneData.querySelector(".product_title a").textContent = item.Name
        cloneData.querySelector("span.sale_price").textContent = (item.Price * 1000).toLocaleString('vi-VN') + "₫"
        cloneData.querySelector(".product_image").href += `&id=${item.ID}`
        cloneData.querySelector(".product_image img").src = item.Img
        dataList.appendChild(cloneData)
    });
    document.querySelector(".shop_sidebar_searchbar input").value = Helper.getParameterByName("search")
    filterBy()
}