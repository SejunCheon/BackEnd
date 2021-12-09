<template>
    <div class="overflow-y-auto" scroll-region>
        <v-app>
            <Main>
                <v-card
                    class="mx-auto my-12 container"
                    max-width="614"
                    outlined
                    v-for="post in posts"
                    :key="post.id"
                >
                    <v-card class="mb-4" outlined>
                        <v-card-title
                            >{{ post.title }}
                            {{ post.content }}
                            <v-spacer></v-spacer>

                            <v-menu bottom right>
                                <template v-slot:activator="{ on, attrs }">
                                    <v-btn icon v-bind="attrs" v-on="on">
                                        <v-icon>mdi-dots-vertical</v-icon>
                                    </v-btn>
                                </template>

                                <v-list>
                                    <v-list-item>
                                        <v-list-item-title
                                            ><a :href="`/posts/${post.id}/edit`"
                                                >수정
                                            </a></v-list-item-title
                                        >
                                    </v-list-item>
                                    <v-list-item>
                                        <v-list-item-title
                                            ><a :href="`/posts/${post.id}/edit`"
                                                >삭제
                                            </a></v-list-item-title
                                        >
                                    </v-list-item>
                                </v-list>
                            </v-menu>
                        </v-card-title>
                        <v-img :src="'/storage/images/' + post.image"></v-img>
                    </v-card>

                    <v-card-text>
                        <v-row
                            align="center"
                            class="mx-0"
                            justify="space-between"
                        >
                            <v-rating
                                :value="4.5"
                                color="amber"
                                dense
                                half-increments
                                readonly
                                size="14"
                            ></v-rating>

                            <div class="grey--text ms-4">
                                {{ post.created_at }}
                            </div>
                        </v-row>

                        <v-card-title>{{ post.title }}</v-card-title>
                    </v-card-text>

                    <v-divider class="mx-4"></v-divider>

                    <v-card-text class="mx-4"> {{ post.content }}</v-card-text>
                </v-card>
            </Main>
        </v-app>
    </div>
</template>

<script>
import Main from "@/Pages/Main.vue";
export default {
    props: ["posts"],
    components: { Main },
    data() {
        return {
            btnMenu: [{ title: "수정" }, { title: "삭제" }],
        };
    },
    mounted() {
        console.log(this.posts);
    },
    methods: {
        edit: function () {
            this.inertia.get("posts.edit", {
                form: this.form,
                _token: this.$page.props.csrf_token,
            });
        },
    },
};
</script>

<style></style>
