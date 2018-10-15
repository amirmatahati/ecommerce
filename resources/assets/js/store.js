let cart = window.localStorage.getItem('cart');
let cartCount = window.localStorage.getItem('cartCount');
let store = {
    state: {
        cart: cart ? JSON.parse(cart) : [],
    cartCount: cartCount ? parseInt(cartCount) : 0,
    },
    mutations: {
        addToCart(state, item) {
            /*
            state.cart.push(image);
    
            state.cartCount++;
            */
           
           let found = state.cart.find(barang => barang.id == item.id);
            if (found) {
                found.quantity ++;
                found.totalPrice = found.quantity * found.price;
            } else {
                state.cart.push(item);

                Vue.set(item, 'quantity', 1);
                Vue.set(item, 'totalPrice', item.price);
            }

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