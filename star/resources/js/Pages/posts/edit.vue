<template>
    <div>
        <v-app>
            <Main />
            <v-card class="mx-auto my-12 container" max-width="614" outlined>
                <v-form
                    @submit.prevent="updatePost"
                    ref="form"
                    lazy-validation
                    v-model="valid"
                >
                    <v-card class="mb-4" outlined>
                        <v-card-title
                            >{{ posts.title }}
                            <v-spacer></v-spacer>
                            <v-btn a href="/posts" color="blue darken-1" dark
                                >목록</v-btn
                            >
                        </v-card-title>
                    </v-card>
                    <v-img :src="`/storage/images/${posts.image}`"></v-img>
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
                                {{ posts.created_at }}
                            </div>
                        </v-row>

                        <v-text-field
                            v-model="form.title"
                            :rules="titleRules"
                        ></v-text-field>
                    </v-card-text>

                    <v-divider class="mx-4"></v-divider>

                    <v-text-field
                        class="mx-4"
                        v-model="form.content"
                        :rules="contentRules"
                    ></v-text-field>
                    <v-btn
                        type="submit"
                        @click="updatePost()"
                        :disabled="!valid"
                        color="blue darken-1"
                        dark
                        >수정하기</v-btn
                    >
                </v-form>
            </v-card>
        </v-app>
    </div>
</template>

<script>
import Main from "@/Pages/Main";
export default {
    props: ["posts"],
    components: { Main },
    data() {
        return {
            valid: false,
            form: {
                title: this.posts.title,
                content: this.posts.content,
                _token: this.$page.props.csrf_token,
            },
            imageRules: [(v) => !!v || "사진은 필수 항목입니다."],
            titleRules: [
                (v) => !!v || "제목은 필수 항목입니다.",
                (v) => (v && v.length <= 10) || "제목은 10자 미만이어야 합니다",
            ],
            contentRules: [
                (v) => !!v || "내용은 필수 항목입니다.",
                (v) => (v && v.length <= 10) || "내용은 10자 미만이어야 합니다",
            ],
        };
    },
    methods: {
        updatePost() {
            this.$inertia.put(`/posts/${this.posts.id}`, this.form);
            this.$refs.form.validate();
            if (this.$refs.form.validate() === false) {
                this.valid = false;
            }
        },
    },
};
</script>
