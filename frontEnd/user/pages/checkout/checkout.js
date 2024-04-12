document.addEventListener('DOMContentLoaded', async () => {
    // Khởi tạo trang
    _init();

    // document.querySelector(".coupon_update_btn").addEventListener("click", async () => {
    //     let items = await CartManager.getItem();
    //     CartManager.clear();
    //     document.querySelectorAll(".cart_table tbody tr").forEach(item=>{
    //         console.log(item.querySelector(".input_number").value);
    //         items[item.querySelector(".item_title").textContent]["Quantity"] = parseInt(item.querySelector(".input_number").value)
    //         CartManager.setItem(item.querySelector(".item_title").textContent, items[item.querySelector(".item_title").textContent])
    //     })
    //     _init();
    // })
})

async function _init() {
    var items = await CartManager.getItem();
    var cartList = document.querySelector(".checkout_table tbody")
    var cartProduct = cartList.querySelector("tr").cloneNode(true)
    cartList.innerHTML = ""
    var _totalPriceCart = 0
    Object.keys(items).forEach(item => {
        var cloneCartProduct = cartProduct.cloneNode(true)
        cloneCartProduct.querySelector(".item_title").textContent = item
        item = items[item]
        cloneCartProduct.querySelector("img").src = item.Img
        cloneCartProduct.querySelector(".price_text").textContent = (item.Price * 1000).toLocaleString("vi-VN") + "₫"
        cloneCartProduct.querySelector(".quantity_text").value = item.Quantity
        cloneCartProduct.querySelector(".total_price").textContent = (parseInt(item.Price) * parseInt(item.Quantity) * 1000).toLocaleString("vi-VN") + "₫"
        _totalPriceCart += (parseInt(item.Price) * parseInt(item.Quantity) * 1000)
        cartList.appendChild(cloneCartProduct)
    });
    var trTemp = document.createElement("tr")
    trTemp.innerHTML = `
        <td></td>
        <td></td>
        <td>
            <span class="subtotal_text">Toàn bộ</span>
        </td>
        <td><span class="total_price">${_totalPriceCart.toLocaleString("vi-VN") + "₫"}</span></td>
    `
    cartList.appendChild(trTemp)
}