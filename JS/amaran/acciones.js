function Notificacion_ok(Titulo, Mensaje, Informacion, iconFont) {
    $.amaran({
        'theme': 'awesome ok',
        'content': {
            title: "Éxito",
            message: Mensaje,
            info: Informacion,
            icon: iconFont
        },
        'cssanimationIn': 'bounceInRight',
        'cssanimationOut': 'zoomOutUp',
        'position': 'top right',
        'delay': '4000'
    });
}
function Notificacion_error(Titulo, Mensaje, Informacion, iconFont) {
    $.amaran({
        'theme': 'awesome error',
        'content': {
            title: Titulo,
            message: Mensaje,
            info: Informacion,
            icon: iconFont
        },
        'cssanimationIn': 'bounceInRight',
        'cssanimationOut': 'zoomOutUp',
        'position': 'top right',
        'delay': '4000'
    });
}
function Notificacion_warning(Titulo, Mensaje, Informacion, iconFont) {
    $.amaran({
        'theme': 'awesome warning',
        'content': {
            title: Titulo,
            message: Mensaje,
            info: Informacion,
            icon: iconFont
        },
        'cssanimationIn': 'bounceInRight',
        'cssanimationOut': 'zoomOutUp',
        'position': 'top right',
        'delay': '4000'
    });
}
function Notificacion_info(Titulo, Mensaje, Informacion, iconFont) {
    $.amaran({
        'theme': 'awesome blue',
        'content': {
            title: Titulo,
            message: Mensaje,
            info: Informacion,
            icon: iconFont
        },
        'cssanimationIn': 'bounceInRight',
        'cssanimationOut': 'zoomOutUp',
        'position': 'top right',
        'delay': '4000'
    });
}