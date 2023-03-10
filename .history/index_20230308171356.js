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
      const ids = this.getSelectedProductIds();
      axios.post('delete_products.php', { ids })
        .then(response => {
          const deletedCount = response.data;
          console.log(`Deleted ${deletedCount} products`);
        })
        .catch(error => {
          console.log(error);
        });
    },
    getSelectedProductIds() {
      const checkboxes = document.querySelectorAll('.delete-checkbox:checked');
      const ids = Array.from(checkboxes).map(checkbox => checkbox.value);
      return ids;
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
