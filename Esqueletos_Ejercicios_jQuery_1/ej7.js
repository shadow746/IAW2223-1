$.fn.existe = function() {

    return this.length > 0;
}
console.log($("h1").existe() ? "Existe" : "No Existe");
