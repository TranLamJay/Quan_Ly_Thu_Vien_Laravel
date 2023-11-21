const addBookBtn = document.querySelector('.book-box__add_book')
const orderBookBtn = document.querySelector('.btn_order_book')

// kéo products về từ api
const getBooks = async () => {
    const response = await fetch(`/api/books/by-order`);
    if (!response.ok) {
        console.log('lỗi');
        return
    }
    return await response.json();
}

let BOOKS

// Thêm một ô chọn sách.
const addBookToBox = () => {
    const bookHtml = `
        <div class="row book-box__item" style="margin-top: 12px">
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <select name="book_item_name"
                    class="form-control book_item_name">
                        ${
                            BOOKS.map((book) =>
                            {
                                return  `
                                <option value="${book.id}" data-count="${book.quantity}">
                                    ${book.name} ( còn ${book.quantity} cuốn)
                                </option>
                            `}).join('')
                        }
                </select>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <input type="number" name="book_item_quantity"
                class="form-control book_item_quantity" placeholder="Nhập số lượng" value="1" min="1">
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                <button type="button"
                    class="book-box__remove_book btn btn-danger">
                    xóa
                </button>
            </div>
        </div>
    `
    const bookBox = document.querySelector('.book-box__container')
    const bookItem = document.createElement('div')
    bookItem.innerHTML = bookHtml

    bookBox.appendChild(bookItem)

    setRemoveBook()
    setOnInputCount()
}

// set sự kiện thay đổi giá trị số lượng
const setOnInputCount = () => {
    const inputCounts = document.querySelectorAll('.book_item_quantity')

    inputCounts.forEach(inputCount => {
        inputCount.onchange = (e) => {
            let bookItem = e.currentTarget;
            while (!bookItem || !bookItem.classList.contains("book-box__item")) {
                bookItem = bookItem.parentElement
            }
            const bookItemSelect = bookItem.querySelector('.book_item_name')
            const bookItemSelected = bookItemSelect.options[bookItemSelect.selectedIndex]
            const value = +e.currentTarget.value
            const countData = +bookItemSelected.dataset.count
            if (value < 1 || value > countData) {
                alert('số lượng sách nằm ngoài giá trị hiện có')
                e.currentTarget.value = 1
                e.currentTarget.focus()
                return
            }

        }
    })
}

// set sự kiện xóa một cuốn sách
const setRemoveBook = () => {
    const removeBookBtns = document.querySelectorAll('.book-box__remove_book')

    removeBookBtns.forEach(removeBookBtn => {
        removeBookBtn.onclick = (e) => {
            let bookItem = e.currentTarget;
            while (!bookItem || !bookItem.classList.contains("book-box__item")) {
                bookItem = bookItem.parentElement
            }
            const countItem = document.querySelectorAll('.book-box__item').length
            if (countItem == 1) {
                alert('không được xóa hết sách')
                return
            }
            bookItem.remove()
        }
    })
}

// set sự kiện thêm một cuốn sách
const setAddBook = () => {
    addBookBtn.onclick = () => {
        addBookToBox()
    }
}

// hàm xử lý đặt hàng
const orderBook = async() => {
    const bookItems = document.querySelectorAll('.book-box__item')
    const userId = document.querySelector('.user_id')
    const userName = document.querySelector('.user_name')
    const userEmail = document.querySelector('.user_email')
    const endDate = document.querySelector('#end_date')
    const form = document.querySelector('#form')


    const data = new FormData()

    data.append('user_id', userId.value)
    data.append('user_name', userName.value)
    data.append('user_email', userEmail.value)
    data.append('end_date', endDate.value)
    data.append('form', form.value)

    // Lặp qua danh sách các cuốn sách
    const books = []
    bookItems.forEach(bookItem => {
        const id = bookItem.querySelector('.book_item_name').value
        const quantity = bookItem.querySelector('.book_item_quantity').value
        const bookTemp = {
            id: +id,
            quantity: +quantity
        }
        // tìm cuốn sách, nếu có rồi thì thay đổi giá trị
        const existBookIndex = books.findIndex(book => book.id == bookTemp.id);
        if (existBookIndex !== -1) {
            books[existBookIndex].quantity = books[existBookIndex].quantity + bookTemp.quantity
            return
        }
        books.push(bookTemp)
    })

    data.append('books', JSON.stringify(books))

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
    BOOKS = await getBooks()
    addBookToBox()
    setAddBook()
    setOrderBook()
}

main()