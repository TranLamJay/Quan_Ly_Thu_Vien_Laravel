import { renderCountCart } from "./helper.js"

const orderBookBtn = document.querySelector('.btn_order_book')
const userId = document.querySelector('.user_id')
const userName = document.querySelector('.user_name')
const userEmail = document.querySelector('.user_email')
const endDate = document.querySelector('.end_date')
const form = document.querySelector('#form')

const setCountCart = async() => {
    const userIdVal = userId.value
    renderCountCart(userIdVal)
}

const renderBook = async() => {
    const userIdVal = userId.value
    const response = await fetch(`api/carts?user_id=${userIdVal}`)

    const data = await response.json()

    const dataHtml = data.map(item => `
        <tr>
            <td>
                <img src="/uploads/${item.image}" style="with: 60px; height: 60px" />
            </td>
            <td>
                ${item.name}
            </td>
            <td>
                1
            </td>
            <td>
                <button class="btn btn-danger book-box__remove_book" data-id="${item.id}" type="button">xóa</button>
            </td>
        </tr>
    `).join('')

    const bookBoxCtn = document.querySelector('.book-box__container')
    bookBoxCtn.innerHTML = dataHtml
    setRemoveBook()
}


const setReturnDate = () => {
    const returnDate = document.querySelector('.return_date');
    const today = new Date();
    const futureDate = new Date();
    futureDate.setDate(today.getDate() + 14);

    // Chuyển đổi ngày thành chuỗi có định dạng YYYY-MM-DD (định dạng của input type="date")
    const formattedFutureDate = futureDate.toISOString().split('T')[0];

    returnDate.value = formattedFutureDate;

}

// set sự kiện xóa một cuốn sách
const setRemoveBook = () => {
    const removeBookBtns = document.querySelectorAll('.book-box__remove_book')

    removeBookBtns.forEach(removeBookBtn => {
        removeBookBtn.onclick = async (e) => {
            const trEle = e.currentTarget.parentElement.parentElement

            const cartDetailId = e.currentTarget.dataset.id

            const response = await fetch(`/api/carts/${cartDetailId}`, {
                method: 'delete'
            })

            const data = await response.json()

            if (response.ok) {
                trEle.remove()
                setCountCart()
            }

            alert(data)
        }
    })
}

// hàm xử lý đặt hàng
const orderBook = async() => {

    const data = new FormData()

    data.append('user_id', userId.value)
    data.append('user_name', userName.value)
    data.append('user_email', userEmail.value)
    data.append('end_date', endDate.value)
    data.append('form', form.value)
    // thực hiện post phiếu mượn lên cho be xử lý
    try {
        const response = await fetch('/api/orders', {
            method: 'POST',
            headers: {
                Accept: "application/json",
            },
            body: data
        })

        // thất bại thì thông báo xong return
        if (!response.ok) {
            const content = await response.json()
            alert(content.message)
            return;
        }
        // thành công thì thông báo xong reload lại trang.
        alert('Mượn thành công')
        location.reload()
    } catch (error) {
        console.error('Lỗi!', error);
    }
}

// hàm xử lý sự kiện đặt hàng
const setOrderBook = () => {
    orderBookBtn.onclick = orderBook
}

const main = async() => {
    setReturnDate()
    setCountCart()
    renderBook()
    setOrderBook()
}

main()