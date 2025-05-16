const API_URL = 'https://dummyjson.com/products/category/smartphones';

fetch(API_URL)
  .then(response => {
    const responseData = response.json();
    return responseData;
  })
  .then(data => {
    const products = data.products;
    products.forEach(product => {
      const productInfo = `Nome: ${product.title}, Marca: ${product.brand}`;
      console.log(productInfo);
    });
  })
  .catch(error => {
    console.error('Erro:', error);
  });
