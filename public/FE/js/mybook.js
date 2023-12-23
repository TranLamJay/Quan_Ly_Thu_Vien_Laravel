const callCardItemElements = document.querySelectorAll('.table .call-card-item')

callCardItemElements?.forEach(callCardItem => {
    const returnDateEle = callCardItem.querySelector('.return_date')
    const statusEle = callCardItem.querySelector('.status')
    const extendEle = callCardItem.querySelector('.extend')

    const returnDate = new Date(returnDateEle.innerText)
    const status = +statusEle.dataset.status
    const now = new Date()

    if (returnDate > now || status == 1) {
        extendEle.classList.add('hidden')
        return
    }

    const extend = +extendEle.dataset.extend
    if (extend == 0) {
        return
    }

    extendEle.classList.add('disabled')
    extendEle.classList.remove('btn-warning')

    if (extend == -1) {
        extendEle.classList.add('btn-danger')
        extendEle.innerText = 'Không được gia hạn'
    }

    if (extend == 1) {
        extendEle.classList.add('btn-success')
        extendEle.innerText = 'Chờ gia hạn'
    }    
});