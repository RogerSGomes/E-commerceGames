var span = document.getElementsByClassName("span");
var div = document.getElementsByClassName("carouseldiv");
var l = 0;
var cont = 1;

// ao clicar na seta da direita (carousel)

span[1].onclick = () => {
    l++
    for (var i of div) {
        if (l == 0) {
            i.style.left = "0px";
        }
        if (l == 1) {
            i.style.left = "-30.98%";
        }
        if (l == 2) {
            i.style.left = "-61.96%";
        }
        if (l == 3) {
            i.style.left = "-92.94%";
        }
        if (l == 4) {
            i.style.left = "-123.92%";
        }
        if (l == 5) {
            i.style.left = "-154.9%";
        }
        if (l == 6) {
            i.style.left = "-185.88%";
        }
        if (l == 7) {
            i.style.left = "-216.86%";
        }
        if (l == 8) {
            i.style.left = "-247.84%";
        }
        if (l == 9) {
            i.style.left = "-278.82%";
        }
        if (l == 10) {
            i.style.left = "-309.8%";
        }
        if (l == 11) {
            i.style.left = "-340.78%";
        }
        if (l > 11) {
            i.style.left = "0px";
            l = 0;
            cont = 0;
            $("#img2, #img3, #img4, #img5, #img6, #img7, #img8, #img9, #img10, #img11, #img12").removeClass("active");
        }
    }
}

// ao clicar na seta da esquerda (carousel)

span[0].onclick = () => {
    l--;
    if (l == -1) {
        l = 11;
        cont = 13;
    }
    for (var i of div) {
        if (l == 0) {
            i.style.left = "0px";
        }
        if (l == 1) {
            i.style.left = "-30.98%";
        }
        if (l == 2) {
            i.style.left = "-61.96%";
        }
        if (l == 3) {
            i.style.left = "-92.94%";
        }
        if (l == 4) {
            i.style.left = "-123.92%";
        }
        if (l == 5) {
            i.style.left = "-154.9%";
        }
        if (l == 6) {
            i.style.left = "-185.88%";
        }
        if (l == 7) {
            i.style.left = "-216.86%";
        }
        if (l == 8) {
            i.style.left = "-247.84%";
        }
        if (l == 9) {
            i.style.left = "-278.82%";
        }
        if (l == 10) {
            i.style.left = "-309.8%";
        }
        if (l == 11) {
            i.style.left = "-340.78%";
            $("#img2, #img3, #img4, #img5, #img6, #img7, #img8, #img9, #img10, #img11, #img12").addClass("active");
        }
    }
}

$(document).ready(function () {

    // ao clicar na seta da direita (carousel)

    $("#right").click(function () {
        if (cont <= 11) {
            limpar();
            cont++;
            $("#imgblur" + cont + ", #content" + cont).addClass("active");
            $(".container").css({
                "background-image": "url(assets/carousel/carousel" + cont + ".jpg)"
            });
            $("#img" + cont).addClass("active");
        }
    });

    // ao clicar na seta da esquerda (carousel)

    $("#left").click(function () {
        if (cont > 1) {
            limpar();
            cont--;
            $("#imgblur" + cont + ", #content" + cont).addClass("active");
            $(".container").css({
                "background-image": "url(assets/carousel/carousel" + cont + ".jpg)"
            });
            $("#img" + cont).addClass("active");
            $("#img" + (cont + 1)).removeClass("active");
        }
    });
});

// limpa os displays das imagens do carousel

function limpar() {
    $(".imgblur, .content").removeClass("active");
}

// ao clicar sobre uma imagem (carousel)

function imgfunc(par) {
    if (par == 1) {
        l = 0;
        cont = 1;
    }
    if (par == 2) {
        l = 1;
        cont = 2;
    }
    if (par == 3) {
        l = 2;
        cont = 3;
    }
    if (par == 4) {
        l = 3;
        cont = 4;
    }
    if (par == 5) {
        l = 4;
        cont = 5;
    }
    if (par == 6) {
        l = 5;
        cont = 6;
    }
    if (par == 7) {
        l = 6;
        cont = 7;
    }
    if (par == 8) {
        l = 7;
        cont = 8;
    }
    if (par == 9) {
        l = 8;
        cont = 9;
    }
    if (par == 10) {
        l = 9;
        cont = 10;
    }
    if (par == 11) {
        l = 10;
        cont = 11;
    }
    if (par == 12) {
        l = 11;
        cont = 12;
    }
    for (var i of div) {
        if (l == 0) {
            i.style.left = "0px";
        }
        if (l == 1) {
            i.style.left = "-30.98%";
        }
        if (l == 2) {
            i.style.left = "-61.96%";
        }
        if (l == 3) {
            i.style.left = "-92.94%";
        }
        if (l == 4) {
            i.style.left = "-123.92%";
        }
        if (l == 5) {
            i.style.left = "-154.9%";
        }
        if (l == 6) {
            i.style.left = "-185.88%";
        }
        if (l == 7) {
            i.style.left = "-216.86%";
        }
        if (l == 8) {
            i.style.left = "-247.84%";
        }
        if (l == 9) {
            i.style.left = "-278.82%";
        }
        if (l == 10) {
            i.style.left = "-309.8%";
        }
        if (l == 11) {
            i.style.left = "-340.78%";
        }
    }
    limpar();
    $("#imgblur" + cont + ", #content" + cont).addClass("active");
    $(".container").css({
        "background-image": "url(assets/carousel/carousel" + cont + ".jpg)"
    });
    for (var cont2 = cont; cont2 >= 2; cont2--) {
        $("#img" + cont2).addClass("active");
    }
}
