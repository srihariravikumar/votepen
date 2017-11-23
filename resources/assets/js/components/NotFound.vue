<template>
	<section class="container margin-top-1 col-7">
		<no-content  :text="message"></no-content>
	</section>
</template>


<script>
	import NoContent from '../components/NoContent.vue';

	export default {
	    data() {
	        return {
	            message: "Whoops! Looks like you're lost."
			}
		},

	    components: {
	    	NoContent
	    }
	};
</script>
