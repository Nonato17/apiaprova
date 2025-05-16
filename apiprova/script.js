fetch('https://dummyjson.com/products/category/smartphones')
  .then(response => response.json())
  .then(d => d.products.forEach(p => 
    console.log(`Nome: ${p.title}, Marca: ${p.brand}`)
  ))
  .catch(e => console.error('Erro:', e));