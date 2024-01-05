import { addBookToCart, getURLParameter, renderCountCart, setCountCart, setURLParameter } from "./helper.js";

const addCartBtn = document.querySelector('.add-book-to-cart');

// hàm xử lý sự kiện cho addCartBtn
const bindingEventAddCartBtn = () => {
    addCartBtn.onclick = async (e) => {
        const bookId = e.currentTarget.dataset.prd
        const addCartCheck = await addBookToCart(bookId);
        if (addCartCheck == true) {
            location.href = '/orders';
        }
    }
}

const main = async () => {
    bindingEventAddCartBtn()
    setCountCart()
}
main()