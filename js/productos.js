const seccion={
    'pizzas':{
        id:'pizzas',
        seccion:'mostrarPizzas',
        tit:'Delipizza - Productos',
        url:'/admin/productos/pizzas',
        in: false,
        init(){
            if (!this.in) return;
            this.in = true;
        },
        mostrar(){
            if (!this.in) this.init();
            $(`.${this.seccion}`).toggleClass('hid', false);
            $('#pizzas').addClass('active');
        },
        ocultar(){
            $(`.${this.seccion}`).toggleClass('hid', true);
            $('#pizzas').removeClass('active');
        }
    },
    'postres':{
        id:'postres',
        seccion:'mostrarPostres',
        tit:'Delipizza - Productos',
        url:'/admin/productos/postres',
        in:false,
        init(){
            if (this.in) return;
            this.in = true;
            //Aquí se cargan los datos de la sección inicio
        },
        mostrar(){
            if (!this.in) this.init();
            $(`.${this.seccion}`).toggleClass('hid', false);
            $('#postres').addClass('active');
        },
        ocultar(){
            $(`.${this.seccion}`).toggleClass('hid', true);
            $('#postres').removeClass('active');
        }
    },
    'bebidas':{
        id:'bebidas',
        seccion:'mostrarBebidas',
        tit:'Delipizza - Productos',
        url:'/admin/productos/bebidas',
        in:false,
        init(){
            if (this.in) return;
            this.in = true;
            //Aquí se cargan los datos de la sección inicio
        },
        mostrar(){
            if (!this.in) this.init();
            $(`.${this.seccion}`).toggleClass('hid', false);
            $('#bebidas').addClass('active');
        },
        ocultar(){
            $(`.${this.seccion}`).toggleClass('hid', true);
            $('#bebidas').removeClass('active');
        }
    },
}
let secActual = null;
function muestraSeccion(sec){
    if(procesando) return;
    let secMostrar = seccion[sec];
    if(!secMostrar) return;
    secActual=secMostrar;
    for(let x in seccion){
        if(seccion[x].id==sec) continue;
        if(seccion[x].ocultar) seccion[x].ocultar(); 
    }
    if(secActual.mostrar) secActual.mostrar();
    document.title = secActual.tit;
    if(window.history){
        if(window.history.pushState) window.history.pushState(null, secActual.tit, secActual.url);
    }
}
let procesando = false;
muestraSeccion('pizzas');

window.onpopstate = function(event){
    event.preventDefault();
    let seccion = String(document.location);
    let idx = seccion.lastIndexOf('/');
    if(idx!= -1){
        seccion= seccion.slice(idx + 1);
    }
    muestraSeccion(seccion);
}