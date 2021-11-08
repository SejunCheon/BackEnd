<template>
    <div>
        <label class="block text-left p-2" style="width:100%">
            <button @click="addComment" class="text-gray-700 p-1">
                댓글등록
            </button>
            <textarea
                v-model="newComment"
                class="form-textarea mt-1 block w-full"
                rows="3"
                placeholder="댓글을 입력하시오"
            ></textarea>
        </label>
        <button class="btn btn-default" @click="getComments">
            댓글 불러오기</button
        ><comment-item
            v-for="(comment, index) in comments.data"
            :key="index"
            :comment="comment"
            :login_user_id="loginuser"
        />
        <pagination
            @pageClicked="getPage($event)"
            v-if="comments.links != null"
            :links="comments.links"
        />
    </div>
</template>

<script>
import CommentItem from "./CommentItem.vue";
import Pagination from "./Pagination.vue";
export default {
    props: ["post", "loginuser"],
    components: { CommentItem, Pagination },
    data() {
        return {
            comments: [],
            newComment: ""
        };
    },
    methods: {
        addComment() {
            if (this.newComment == "") {
                alert("한글자라도 입력하시오");
                return;
            }
            axios
                .post("/comments/" + this.post.id, { comment: this.newComment })
                .then(res => {
                    console.log(res.data);
                    this.getComments();
                    this.newComment = "";
                })
                .catch(err => {
                    console.log(err);
                });
        },
        getPage(url) {
            console.log(url);
            axios
                .get(url)
                .then(res => {
                    this.comments = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        getComments() {
            // this.comments = [
            //     "1st comment",
            //     "2nd comment",
            //     "3rd comment",
            //     "4th comment",
            //     "5th comment"
            // ];
            // 서버에 현재 게시글의 댓글 리스트를 비동기적으로 요청
            // 즉, axios를 이용해서 요청
            // 서버가 댓글 리스트를 주면 그놈을 어디에 할당해?
            // this.comments에 할당.
            axios
                .get("/comments/" + this.post.id)
                .then(res => {
                    // console.log(res);
                    this.comments = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
};
</script>
