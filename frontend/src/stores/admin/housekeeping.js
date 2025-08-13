import { defineStore } from 'pinia';
// import HousekeepingApiService from '@/services/Admin/HousekeepingApiService';

export const useAdminHousekeepingStore = defineStore('adminHousekeeping', {
    state: () => ({
        rooms: [],
        tasks: [],
        isLoading: false,
    }),
    actions: {
        // async loadRooms(filters) {
            // Logic:
            // 1. Set `this.isLoading = true;`.
            // 2. Call `HousekeepingApiService.fetchRooms(filters)`.
            // 3. Commit response to `this.rooms`.
            // 4. In `finally`, set `this.isLoading = false;`.
        // },
        // async changeRoomStatus(roomId, newStatus) {
            // Logic:
            // 1. Call `HousekeepingApiService.updateRoomCleaningStatus(roomId, newStatus)`.
            // 2. On success, find the room in the local `this.rooms` array and update its status
            //    to provide instant UI feedback without needing a full reload.
        // },
        async loadMyTasks() {
            // Logic:
            // 1. Set `this.isLoading = true;`.
            // 2. Call `HousekeepingApiService.fetchMyTasks()`.
            // 3. Commit response to `this.tasks`.
            // 4. In `finally`, set `this.isLoading = false;`.
        }
    }
});
