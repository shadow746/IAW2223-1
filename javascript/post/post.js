var listapost = []

function anadir ()
{
  let post;
  //let listapost =[];
  post = document.getElementById("post").value;
  listapost.push(post);
  imprimir(listapost);
}

function imprimir(listapost)
{
  let newdiv,newcontdiv,i,longitud,newboton;
  longitud = listapost.length;
  document.getElementById("posteos").innerHTML = "";
  
  for(i=0;i<longitud;i++)
  {
    newdiv = document.createElement("div");
      newcontdiv = document.createTextNode(listapost[i]);
      newdiv.appendChild(newcontdiv);
      //newdiv.id = "div"+i;
      newboton = document.createElement("button");
      newboton.id=i;
      newdiv.append(newboton);
      newboton.onclick = "borrarpost(listapost,this)";
      newboton.innerHTML = "Borrar"; 
    document.getElementById("posteos").append(newdiv);
  }
}

function borrarpost(listapost,boton)
{
  let id = boton.id;
  listapost.splice(id,1);
  imprimir(listapost);
  
}
