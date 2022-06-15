<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Nav from '@/Pages/Website/Components/Nav.vue';
import NewsLetter from '@/Pages/Website/Components/NewsLetter.vue';
import Footer from '@/Pages/Website/Components/Footer.vue';

defineProps({
	title: String,
});

const logout = () => {
	Inertia.post(route('logout'));
};

</script>

<template>
	<div>

		<Head :title="title" />

		<header>
			<Nav />
			<slot name="banner" />
			
		</header>

		<slot name="content" />

		<NewsLetter />
		<Footer />

	</div>
</template>
