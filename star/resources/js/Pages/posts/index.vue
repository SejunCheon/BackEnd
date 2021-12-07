<template>
    <div>
        <v-app>
            <v-card class="mx-auto my-12" max-width="374">
                <v-img
                    height="250"
                    src="https://cdn.vuetifyjs.com/images/cards/cooking.png"
                ></v-img>

                <v-card-title>Cafe Badilico</v-card-title>

                <v-card-text>
                    <v-row align="center" class="mx-0">
                        <v-rating
                            :value="4.5"
                            color="amber"
                            dense
                            half-increments
                            readonly
                            size="14"
                        ></v-rating>

                        <div class="grey--text ms-4">4.5 (413)</div>
                    </v-row>

                    <div class="my-4 text-subtitle-1">$ • Italian, Cafe</div>

                    <div>
                        Small plates, salads & sandwiches - an intimate setting
                        with 12 indoor seats plus patio seating.
                    </div>
                </v-card-text>

                <v-divider class="mx-4"></v-divider>

                <v-card-title>Tonight's availability</v-card-title>

                <v-card-text> </v-card-text>
            </v-card>
        </v-app>
    </div>
</template>

<script>
export default {
    data() {
        return {};
    },
};
</script>

<style></style>
