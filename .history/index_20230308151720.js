Vue.createApp({
  data() {
    return {
      sku: "",
      name: "",
      price: "",
      dimension: "",
      products: [],
    };
  },
  methods: {
    deleteProducts() {
      const checkboxes = document.querySelectorAll('.delete-checkbox:checked');
      const skus = [];
      checkboxes.forEach(checkbox => {
          skus.push(checkbox.parentElement.querySelector('p:nth-child(1)').innerText.split(':')[1].trim());
      });
      if (skus.length > 0) {
          axios.post('delete_products.php', { skus })
              .then(response => {
                  this.products = this.products.filter(product => !skus.includes(product.sku));
              })
              .catch(error => {
                  console.log(error);
              });
      }
      
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
