<template>
    <div>
        <button class="btn btn-default" @click="getComments">
            댓글 불러오기<comment-item
                v-for="(comment, index) in comments"
                :key="index"
                :comment="comment"
            />
        </button>
        댓글 리스트
    </div>
</template>

<script>
import CommentItem from "./CommentItem.vue";
export default {
    props: ["post", "loginuserid"],
    components: { CommentItem },
    data() {
        return {
            comments: []
        };
    },
    methods: {
        getComments() {
            this.comments = [
                "1st comment"
                // "2nd comment",
                // "3rd comment",
                // "4th comment",
                // "5th comment"
            ];
        }
    }
};
</script>
