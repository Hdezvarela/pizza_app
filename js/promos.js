const seccion={
    'promo':{
        id:'promo',
        seccion:'mostrarPromo',
        tit:'Delipizza - Productos',
        url:'/productos/promociones',
        in: false,
        init(){
            if (!this.in) return;
            this.in = true;
        },
        mostrar(){
            if (!this.in) this.init();
            $(`.${this.seccion}`).toggleClass('hid', false);
        },
        ocultar(){
            $(`.${this.seccion}`).toggleClass('hid', true);
        }
    },
    'registrarPromo':{
        id:'registrarPromo',
        seccion:'regPromo',
        tit:'Delipizza - Productos',
        url:'/productos/reg-promocion',
        in:false,
        init(){
            if (this.in) return;
            this.in = true;
            //Aquí se cargan los datos de la sección inicio
        },
        mostrar(){
            if (!this.in) this.init();
            $(`.${this.seccion}`).toggleClass('hid', false);
        },
        ocultar(){
            $(`.${this.seccion}`).toggleClass('hid', true);
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
muestraSeccion('promo');

window.onpopstate = function(event){
    event.preventDefault();
    let seccion = String(document.location);
    let idx = seccion.lastIndexOf('/');
    if(idx!= -1){
        seccion= seccion.slice(idx + 1);
    }
    muestraSeccion(seccion);
}