<script setup>
import { ref } from 'vue';

import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
	//  title: String,
});

const showingNavigationDropdown = ref(true);


</script>

<template>
	<div
		class="h-full hidden md:block  fixed p-3 space-y-2 overflow-y-scroll md:w-1/5 bg-coolGray-50 text-coolGray-800  md:float-start">
		<div class="flex items-center p-2 space-x-4">
			<div v-if="$page.props.jetstream.managesProfilePhotos" class="shrink-0 mr-1">
				<img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url"
					:alt="$page.props.user.name">
			</div>
			<div>
				<div class="font-medium text-base text-gray-800">
					{{ $page.props.user.last_name }}
				</div>
				<span class="flex items-center space-x-1">
					<Link :href="route('profile.show')" :active="route().current('profile.show')">
					<span class="text-sm hover:underline text-coolGray-600">View profile</span>
					</Link>
				</span>
			</div>
		</div>
		<div class="divide-y divide-coolGray-300">
			<ul class="pt-2 pb-4 space-y-1 text-sm">
				<li class="bg-coolGray-100 text-coolGray-900">
					<Link :href="route('dashboard')" :active="route().current('dashboard')"
						class="flex items-center p-2 space-x-3 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
						class="w-5 h-5 fill-current text-coolGray-600">
						<path
							d="M68.983,382.642l171.35,98.928a32.082,32.082,0,0,0,32,0l171.352-98.929a32.093,32.093,0,0,0,16-27.713V157.071a32.092,32.092,0,0,0-16-27.713L272.334,30.429a32.086,32.086,0,0,0-32,0L68.983,129.358a32.09,32.09,0,0,0-16,27.713V354.929A32.09,32.09,0,0,0,68.983,382.642ZM272.333,67.38l155.351,89.691V334.449L272.333,246.642ZM256.282,274.327l157.155,88.828-157.1,90.7L99.179,363.125ZM84.983,157.071,240.333,67.38v179.2L84.983,334.39Z">
						</path>
					</svg>
					<span>
						Dashboard
					</span>

					</Link>
				</li>
				<li>
					<Link :href="route('users')" :active="route().current('users')"
						class="flex items-center p-2 space-x-3 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
						stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
					</svg>
					Users

					</Link>
				</li>
				<li>
					<Link :href="route('categories')" :active="route().current('categories')"
						class="flex items-center p-2 space-x-3 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
						stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
					</svg>
					<span>Products Categories</span>
					</Link>
				</li>
				<li>
					<Link :href="route('products')" :active="route().current('products')"
						class="flex items-center p-2 space-x-3 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
						stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
					</svg>
					<span>Products</span>
					</Link>
				</li>
				<li>
					<Link :href="route('discounts')" :active="route().current('discounts')"
						class="flex items-center p-2 space-x-3 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
						stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
					</svg>
					<span>Discounts</span>
					</Link>
				</li>
				<li>
					<Link :href="route('orders')" :active="route().current('orders')"
						class="flex items-center p-2 space-x-3 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
						stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
					</svg>
					<span>Orders</span>
					</Link>
				</li>
				<li>
					<Link :href="route('adverts')" :active="route().current('adverts')"
						class="flex items-center p-2 space-x-3 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
						stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
					</svg>
					<span>Adverts</span>
					</Link>
				</li>
				<li>
					<Link :href="route('blogposts')" :active="route().current('blogposts')"
						class="flex items-center p-2 space-x-3 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
						stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
					</svg>
					<span>Blog Posts</span>
					</Link>
				</li>
				<li>
					<Link :href="route('logs')" :active="route().current('logs')"
						class="flex items-center p-2 space-x-3 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
						stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
					</svg>
					<span>Logs</span>
					</Link>
				</li>
				<li>
					<Link :href="route('contacts')" :active="route().current('contacts')"
						class="flex items-center p-2 space-x-3 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
						stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
					</svg>
					<span>Contact Us</span>
					</Link>
				</li>
			</ul>
			<ul class="pt-4 pb-2 space-y-1 text-sm">
				<li>
					<Link rel="noopener noreferrer" href="#" class="flex items-center p-2 space-x-3 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
						stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
						<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
					</svg>
					<span>Settings</span>
					</Link>
				</li>
				<li>

					<!-- Authentication -->
					<form method="POST" @submit.prevent="logout">
						<JetResponsiveNavLink as="button" class="flex  items-center p-2 space-x-3 rounded-md">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
								class="w-5 h-5 fill-current text-coolGray-600">
								<path
									d="M440,424V88H352V13.005L88,58.522V424H16v32h86.9L352,490.358V120h56V456h88V424ZM320,453.642,120,426.056V85.478L320,51Z">
								</path>
								<rect width="32" height="64" x="256" y="232"></rect>
							</svg>

							<span> Log Out</span>
						</JetResponsiveNavLink>
					</form>
				</li>
			</ul>
		</div>
	</div>
</template>
