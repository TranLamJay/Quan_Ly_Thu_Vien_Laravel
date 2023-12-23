const selectExtends = document.querySelectorAll('.select-extend')

selectExtends.forEach(selectExtend => {
    selectExtend.onchange = () => {
        const id = selectExtend.dataset.id
        const value = selectExtend.value
        location.href = `/admin/callCards/handle-extend/${id}?extend=${value}`
    }
})