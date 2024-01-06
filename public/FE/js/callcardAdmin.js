const selectExtends = document.querySelectorAll('.select-extend')
const selecStatuss = document.querySelectorAll('.select-status')

selectExtends.forEach(selectExtend => {
    selectExtend.onchange = () => {
        const id = selectExtend.dataset.id
        const value = selectExtend.value
        location.href = `/admin/callCards/handle-extend/${id}?extend=${value}`
    }
})

selecStatuss.forEach(selecStatus => {
    selecStatus.onchange = () => {
        const id = selecStatus.dataset.id
        const value = selecStatus.value
        location.href = `/admin/callCards/handle-status/${id}?status=${value}`
    }

    
    const valueDefault = selecStatus.dataset.value
    const optionDaTra = selecStatus.querySelector('option[value="2"]')
    const optionChoXacNhan = selecStatus.querySelector('option[value="0"]')
    optionChoXacNhan.classList.add('d-none')
    
    if (valueDefault == 1) {
        optionDaTra.classList.remove('d-none')
    } else {
        optionDaTra.classList.add('d-none') 
    }
})
