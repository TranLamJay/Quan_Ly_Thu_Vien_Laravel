const getURLParameter = function(paramsArray){
    if (!paramsArray) return {};

    var sPageURL		= decodeURIComponent(window.location.search.substring(1));

    var sURLVariables 	= sPageURL?sPageURL.split('&'):[];
    var paramsResult	= {};

    for(var j = 0; j < paramsArray.length; j++) {
        paramsResult[paramsArray[j]] = null;
    }


    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (paramsResult[sParameterName[0]]==null)
            paramsResult[sParameterName[0]]=sParameterName[1];
    }

    return paramsResult;
}

function setURLParameter(params) {
    const currentUrl = window.location.href;
    const url = new URL(currentUrl);
    
    for (const key in params) {
        if (params.hasOwnProperty(key)) {
            url.searchParams.set(key, params[key]);
        }
    }
    
    window.history.pushState({}, '', url);
}

const renderCountCart = async(userId) => {
    const countBookInCartEle = document.querySelector('.count-book-in-cart')

    if (!userId) {
        countBookInCartEle.innerText = 0
        return
    }
    const response = await fetch(`/api/carts/count?user_id=${userId}`)
    const data = await response.json()

    countBookInCartEle.innerText = data
}

export {
    getURLParameter,
    setURLParameter,
    renderCountCart,
}