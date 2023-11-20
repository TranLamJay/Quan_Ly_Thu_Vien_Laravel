import { getURLParameter, setURLParameter } from "./helper.js";

const productContainerEle = document.querySelector('.tg-products .tg-productgrid');

// kéo products về từ api
const getProducts = async (params) => {
    let paramsStr = '';
    for (const key in params) {
        if (Object.hasOwn(params, key)) {
            const val = params[key];
            if (val != null && val != 'null') {
                paramsStr += `&${key}=${val}`
            }
        }
    }
    const response = await fetch(`/api/books?true${paramsStr}`);
    if (!response.ok) {
        console.log('lỗi');
        return
    }
    return await response.json();
}

// hiển thị danh sách product từ data kéo về
const renderProducts = async (data = []) => {
    const dataHtml = data.map(product =>
        `
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                <div class="tg-postbook">
                    <figure class="tg-featureimg">
                        <div class="tg-bookimg">
                            <div class="tg-frontcover">
                                <img src="${product.image == '' ? 'FE/images/books/img-07.jpg' : product.image}"
                                    alt="image ${product.name}">
                            </div>
                            <div class="tg-backcover">
                                <img src="${product.image == '' ? 'FE/images/books/img-07.jpg' : product.image}"
                                    alt="image ${product.name}">
                            </div>
                        </div>
                    </figure>
                    <div class="tg-postbookcontent">
                        <ul class="tg-bookscategories">
                            <li><a href="javascript:void(0);">${product.category.name}</a></li>
                        </ul>
                        <div class="tg-booktitle">
                            <h3><a href="/books/${product.id}">${product.name}</a></h3>
                        </div>
                        <span class="tg-bookwriter">${product.language.type_languages}</span>
                    </div>
                </div>
            </div>
            `
    ).join('')

    productContainerEle.innerHTML = dataHtml
}

// set sự kiện click chuột vào menu item
const setOnClickMenuItem = async () => {
    const menuItems = document.querySelectorAll('.sidebar_content_tg li a')
    menuItems.forEach(menuItem => {
        menuItem.onclick = (e) => {
            const params = getURLParameter(['category', 'name', 'producer', 'author', 'language'])
            const item = e.currentTarget
            params[item.dataset.type] = item.dataset.id

            showProducts(params)
            setURLParameter(params)
        }
    });
}

// set sự kiện click vào nút reset
const setOnClickResetBtn = async () => {
    const resetBtn = document.querySelector('.reset_btn')
    resetBtn.onclick = (e) => {
        showProducts(null)
        setURLParameter({ 'category': null, 'name': null, 'producer': null, 'author': null, 'language': null })
    }
}

// set sự kiện nhập vào ô search
const setOnInputMenuSearch = async () => {
    const menuSearch = document.querySelector('.sidebar_content_search')

    menuSearch.oninput = (e) => {
        const params = getURLParameter(['category', 'name', 'producer', 'author', 'language'])

        const item = e.currentTarget
        console.log(params);
        params['name'] = item.value
        showProducts(params)
        setURLParameter(params)
    }
}

// hàm showproduct kết hợp kéo data về sau đó hiển thị
const showProducts = async (params) => {
    const data = await getProducts(params)
    renderProducts(data.data)
}

const main = async () => {
    const params = getURLParameter(['category', 'name', 'producer', 'author', 'language'])
    showProducts(params)
    setOnClickMenuItem()
    setOnInputMenuSearch()
    setOnClickResetBtn()
}
main()