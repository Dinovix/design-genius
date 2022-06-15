<script setup>
import {  Link } from '@inertiajs/inertia-vue3';
const props = defineProps({
    type: {
        type: String,
        default: 'button',
    },
	href: {
		type: String,
		default: '#',
	},
	styleClass: {
		type: String,
		default: '',
	},
	});

const	classes  = "inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition";
</script>

<template>
    <button 
	v-if="(type == 'button') " :type="type" :class="(classes + styleClass)">
        <slot />
    </button>

	<Link
	v-if="(type == 'link') " :href="href" :class="(classes + styleClass)">
		<slot />
	</Link>
</template>
