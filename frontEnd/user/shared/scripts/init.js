
document.addEventListener('DOMContentLoaded', async () => {
    // Đặt các layouts
    await _getLayouts()
    // Đặt tiêu đề
    _setTitle()
    // Hiển thị sản phẩm đang có trong cart
    CartManager.show()
})

async function _getLayouts() {
    async function fetchHTML(url) {
        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error('Fetch HTML error:', response.status);
            }
            return await response.text();
        } catch (error) {
            console.error('Fetch HTML error:', error);
            throw error;
        }
    }
    try {
        // Get components
        var components = document.createElement("div")
        components.innerHTML = await fetchHTML("./shared/components/layout.html");
        // Set Header
        document.querySelector("header.header_section.header_1").innerHTML = components.querySelector("header.header_section.header_1").innerHTML;
        // Set sidebar
        document.querySelector("section.sidebar_section").innerHTML = components.querySelector("section.sidebar_section").innerHTML;
        // Set footer
        document.querySelector("footer.footer_section.position-relative").innerHTML = components.querySelector("footer.footer_section.position-relative").innerHTML;
    } catch (error) {
        console.error('Error loading HTML:', error);
    }
}

function _setTitle() {
    function getParameterFromURL(parameterName) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(parameterName);
    }

    const paramValue = getParameterFromURL('page');
    var title = "Trang chủ"
    switch (paramValue) {
        case "products":
            title = "Danh sách sản phẩm"
            document.querySelector('#navbarSupportedContent a[href="./?page=products"]').classList.add("active")
            break;
        case "productDetail":
            title = "Chi tiết sản phẩm"
            document.querySelector('#navbarSupportedContent a[href="./?page=products"]').classList.add("active")
            break;
        case "blogs":
            title = "Danh sách bài viết"
            document.querySelector('#navbarSupportedContent a[href="./?page=blogs"]').classList.add("active")
            break;
        case "blogDetail":
            title = "Chi tiết bài viết"
            document.querySelector('#navbarSupportedContent a[href="./?page=blogs"]').classList.add("active")
            break;
        case "contact":
            title = "Liên hệ với chúng tôi"
            document.querySelector('#navbarSupportedContent a[href="./?page=contact"]').classList.add("active")
            break;
        default:
            document.querySelector('#navbarSupportedContent a[href="./"]').classList.add("active")
            break;
    }
    document.querySelector("head title").textContent = title
}
