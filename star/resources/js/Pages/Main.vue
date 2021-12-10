<template>
    <div id="App">
        <v-app-bar
            class="fixed-bar"
            color="primary"
            elevation="4"
            outlined
            dark
            fixed
        >
            <!-- 서치로 이름치면 찾아주는거 하다 말았음 -->
            <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>
            <v-toolbar-title
                ><div class="titleName">
                    <a href="/posts">Outstargram</a>
                </div></v-toolbar-title
            >
            <div class="title">
                <v-col cols="12" sm="5">
                    <!-- prepend-icon="mdi-magnify"  검색 아이콘-->
                    <v-form>
                        <!-- <input type="text" @keyup.enter.prevent="submit" /> -->
                        <v-input></v-input>
                        <v-textarea
                            v-model="search"
                            class="text"
                            rows="1"
                            placeholder="Search title..."
                        ></v-textarea>
                    </v-form>
                </v-col>
            </div>
            <div class="dialog">
                <v-row justify="center">
                    <v-dialog v-model="isOpen" max-width="600px">
                        <template v-slot:activator="{ on, attrs }">
                            <v-icon
                                dark
                                class="mx-2"
                                v-bind="attrs"
                                v-on="on"
                                @click.stop="isOpen = true"
                                >mdi-plus</v-icon
                            >
                        </template>

                        <v-form
                            @submit.prevent="submit"
                            ref="form"
                            v-model="valid"
                            lazy-validation
                        >
                            <v-card>
                                <v-card-title class="cardTitle">
                                    <span class="text-h5"
                                        >새 게시물 만들기</span
                                    >
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col cols="12">
                                                <v-file-input
                                                    filled
                                                    prepend-icon="mdi-camera"
                                                    v-model="form.image"
                                                ></v-file-input>
                                            </v-col>
                                            <v-col cols="12">
                                                <v-text-field
                                                    label="title*"
                                                    v-model="form.title"
                                                    :counter="10"
                                                    :rules="titleRules"
                                                    required
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12">
                                                <v-text-field
                                                    label="content*"
                                                    v-model="form.content"
                                                    :counter="10"
                                                    :rules="contentRules"
                                                    required
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                    <small>*꼭 입력하세요</small>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                        color="blue darken-1"
                                        text
                                        @click="btnClose(), resetValidate()"
                                    >
                                        Close
                                    </v-btn>
                                    <v-btn
                                        type="submit"
                                        color="blue darken-1"
                                        text
                                        @click="save()"
                                        :loading="dialog"
                                        :disabled="!valid"
                                    >
                                        Save
                                    </v-btn>
                                    <v-dialog
                                        v-model="dialog"
                                        hide-overlay
                                        persistent
                                        width="300"
                                    >
                                        <v-card color="primary" dark>
                                            <v-card-text>
                                                로딩중 잠시 기다려주세요
                                                <v-progress-linear
                                                    indeterminate
                                                    color="white"
                                                    class="mb-0"
                                                ></v-progress-linear>
                                            </v-card-text>
                                        </v-card>
                                    </v-dialog>
                                </v-card-actions>
                            </v-card>
                        </v-form>
                    </v-dialog>
                    <v-btn icon href="/user/profile">
                        <v-icon>{{ icon.mdiAccount }}</v-icon>
                    </v-btn>
                </v-row>
            </div>
        </v-app-bar>

        <v-navigation-drawer
            v-model="drawer"
            fixed
            temporary
            dark
            color="primary"
            :mini-variant="miniVariant"
        >
            <v-list-item two-line :class="miniVariant && 'px-0'">
                <v-list-item-avatar>
                    <!-- 네비게이션바에서 프로필사진구현 -->
                    <img
                        src="/storage/profile-photos/CPTrKTCPowS6v5zvmDTdwWp1Mxgwe5Y3PV1t3Eix.png"
                        alt=""
                    />
                </v-list-item-avatar>

                <v-list-item-content>
                    <v-list-item-title> 어플리케이션 </v-list-item-title>
                    <v-list-item-subtitle> 서브텍스트 </v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>

            <v-divider></v-divider>

            <v-list dense nav>
                <v-list-item
                    v-for="item in items"
                    :key="item.title"
                    link
                    :href="item.path"
                >
                    <v-list-item-icon>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-item-icon>

                    <v-list-item-content>
                        <v-list-item-title>{{ item.title }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <!-- <v-list-item-icon>
                        <v-icon>mdi-help-box</v-icon>
                    </v-list-item-icon> -->

                    <!-- <v-form method="POST" @submit.prevent="logout">
                        <v-list-item-content>
                            <v-list-item-title @click="logout()"
                                >Logout</v-list-item-title
                            >
                        </v-list-item-content>
                    </v-form> -->
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-content>
            <slot />
        </v-content>
    </div>
</template>

<script>
import { mdiAccount } from "@mdi/js";

export default {
    props: ["posts"],
    components: {},
    data() {
        return {
            valid: false,
            drawer: false, // 사이드 바 활성화
            isOpen: false, // 다이얼로그 활성화
            dialog: false,
            miniVariant: false,
            search: "", // 검색
            icon: { mdiAccount },
            items: [
                {
                    title: "Dashboard",
                    icon: "mdi-view-dashboard",
                    path: "/dashboard",
                },
                { title: "Photos", icon: "mdi-image", path: "/gal" },
                {
                    title: "Laravel 8x",
                    icon: "mdi-help-box",
                    path: "https://laravel.com/docs/8.x",
                },
            ],
            form: {
                image: null,
                title: null,
                content: null,
            },
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
        openModal: function () {
            this.isOpen = true;
        },
        logout() {
            this.$inertia.post(route("logout"));
        },
        reset: function () {
            this.form = {
                image: null,
                title: null,
                content: null,
                _token: this.$page.props.csrf_token,
            };
        },
        resetValidate() {
            this.$refs.form.reset();
            this.isOpen = false;
        },
        save: function () {
            this.$inertia.post("/posts", this.form);
            this.$refs.form.validate();
            if (this.$refs.form.validate() === false) {
                this.dialog = false;
            } else {
                this.reset();
                this.$refs.form.reset();
                this.dialog = true;
                setTimeout(() => (this.isOpen = false), 500);
            }
        },
        btnClose: function () {
            this.reset();
            this.resetValidate();
            this.isOpen = false;
        },
        validate() {
            this.$refs.form.validate();
        },
    },
    watch: {
        dialog(val) {
            // 로딩중
            if (!val) return;

            setTimeout(() => (this.dialog = false), 500);
        },
    },
    computed: {
        filteredList() {
            this.posts.filter((post) => {
                return post.title
                    .toLowerCase()
                    .includes(this.search.toUpperCase());
            });
        },
    },
    mounted() {
        console.log(this.form);
    },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Sacramento&display=swap");

* {
    box-sizing: border-box;
}

body {
    margin-top: 25px;
}

.title {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-grow: 1;
}

.titleName a {
    font-family: "Sacramento", cursive;
    font-size: 35px;
    color: white;
}

.text {
    align-items: center;
}

.dialog {
    display: flex;
    align-items: center;
}

.cardTitle {
    display: flex;
    justify-content: center;
}
</style>
