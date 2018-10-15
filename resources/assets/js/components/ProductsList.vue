<template>
    <table>
        <thead>
            <th>Name</th>
            <th>Price</th>
            <th></th>
        </thead>

        <tbody>
            <tr v-for="image in items" :key="image.id">
                <td v-text="image.title"></td>

                <td>${{ image.price.toFixed(2) }}</td>

                <td><button class="button is-success"
        @click="addToCart(image)">Add to Cart</button></td>
            </tr>
        </tbody>
    </table>
</template>
<script>
export default {
    data() {
        return {
            items: [
                {
                    id: 1,
                    title: 'Children of Bodon - Hatebreeder',
                    price: 1000
                },
                {
                    id: 2,
                    title: 'Emperor - Anthems to the Welkin at Dusk',
                    price: 2000
                },
                {
                    id: 3,
                    title: 'Epica - The Quantum Enigma',
                    price: 3000
                },
                {
                    id: 4,
                    title: 'Chthonic - Takasago Army',
                    price: 4000
                },
                {
                    id: 5,
                    title: 'Silencer - Death - Pierce Me',
                    price: 5000
                },
                {
                    id: 6,
                    title: 'My Dying Bride - 34.788%... Complete',
                    price: 10.00
                },
                {
                    id: 7,
                    title: 'Shape of Despair - Shades of',
                    price: 7.80
                },
                {
                    id: 8,
                    title: 'Ne Obliviscaris - Portal of I',
                    price: 11.30
                },
                {
                    id: 9,
                    title: 'Protest the Hero - Fortress',
                    price: 5.55
                },
                {
                    id: 10,
                    title: 'Dark Lunacy - Devoid',
                    price: 6.00
                },
            ]
        };
    },
    methods: {
        addToCart(image) {
            this.$store.commit('addToCart', image);
        }
    },
   
}
</script>