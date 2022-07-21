<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";

defineProps(["users"]);
</script>

<template>
	<AppLayout title="Users Management">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Users Management
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div
					class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5"
				>
						<Table
							:resource="users"
							name="users"
							preserve-scroll="table-top"
						>
							<template #cell(actions)="{ item: user }">
								<a :href="`/users/${user.id}/edit`"> Edit </a>
							</template>
						</Table>
				</div>
			</div>
		</div>
	</AppLayout>
</template>
