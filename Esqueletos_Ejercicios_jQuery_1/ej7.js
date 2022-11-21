$.fn.existe = function() {

    return this.length > 0;
}

  

console.log($("p").existe() ? "Existe" : "No Existe");
