let cart = window.localStorage.getItem('cart');
let cartCount = window.localStorage.getItem('cartCount');
let store = {
    state: {
        cart: cart ? JSON.parse(cart) : [],
    cartCount: cartCount ? parseInt(cartCount) : 0,
    },
    mutations: {
        addToCart(state, image) {
            state.cart.push(image);
    
            state.cartCount++;
        },
        removeFromCart(state, image) {
            let index = state.cart.indexOf(image);
        
            if (index > -1) {
                let product = state.cart[index];
                state.cartCount -= product.quantity;
        
                state.cart.splice(index, 1);
            }
        },
        saveCart(state) {
            window.localStorage.setItem('cart', JSON.stringify(state.cart));
            window.localStorage.setItem('cartCount', state.cartCount);
        }
    },
};

export default store;