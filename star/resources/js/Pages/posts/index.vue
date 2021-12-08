<template>
    <v-app>
        <div>
            <Main />
        </div>

        <v-card class="mx-auto my-12" max-width="374">
            <v-img
                height="250"
                src="https://cdn.vuetifyjs.com/images/cards/cooking.png"
            ></v-img>

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
                    Small plates, salads & sandwiches - an intimate setting with
                    12 indoor seats plus patio seating.
                </div>

                <div v-for="post in posts" :key="post.id">{{ post.title }}</div>

                <div v-for="post in posts" :key="post.id">
                    {{ post.content }}
                </div>
            </v-card-text>

            <v-divider class="mx-4"></v-divider>

            <!-- <v-card-title>{{ post.title }}</v-card-title> -->

            <!-- <v-card-text> {{ post.content }}</v-card-text> -->
        </v-card>

        <v-simple-table dense>
            <template v-slot:default>
                <thead>
                    <tr>
                        <th class="text-left">제목</th>
                        <th class="text-left">내용</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr :posts="$post"> -->
                    <tr v-for="post in posts" :key="post.id">
                        <td>{{ post.title }}</td>
                        <td>{{ post.content }}</td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
    </v-app>
</template>

<script>
import Main from "@/Pages/Main.vue";
export default {
    props: ["posts"],
    components: { Main },
    data() {
        return {};
    },
};
</script>

<style></style>
