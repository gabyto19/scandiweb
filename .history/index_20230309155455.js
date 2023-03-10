Vue.createApp({
  data() {
    return {
      sku: "",
      name: "",
      price: "",
      dimension: "",
      products: [],
      selectedProducts: [],
    };
  },
  methods: {
    deleteProducts() {
      const selectedProducts = document.querySelectorAll('.delete-checkbox:checked');
      const productIds = [];
  
      selectedProducts.forEach((product) => {
        productIds.push(product.parentNode.querySelector('p:nth-of-type(1)').textContent.replace('id:', ''));
      });
  
      axios.post('delete_products.php', { productIds: productIds })
        .then(response => {
          this.products = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  created() {
    axios.get('get_products.php')
      .then(response => {
        this.products = response.data;
      })
      .catch(error => {
        console.log(error);
      });
  },
 
}).mount("#app");
