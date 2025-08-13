import { defineStore } from 'pinia';
// import HotelSetupApiService from '@/services/Admin/HotelSetupApiService';

export const useAdminHotelSetupStore = defineStore('adminHotelSetup', {
    state: () => ({
        staff: [],
        staffPagination: {},
        roomTypes: [],
        // ... other state properties for rooms, settings, etc.
        isLoading: false,
    }),
    actions: {
        // async loadStaff(filters) {
            // Logic:
            // 1. Set `this.isLoading = true;`.
            // 2. Call `HotelSetupApiService.fetchStaff(filters)`.
            // 3. Commit response to `this.staff` and `this.staffPagination`.
            // 4. In `finally`, set `this.isLoading = false;`.
        // },
        // async addStaff(staffData) {
            // Logic:
            // 1. Call `HotelSetupApiService.createStaff(staffData)`.
            // 2. On success, refresh the staff list to show the new member: `this.loadStaff()`.
        // },
        // ... other actions for loading/managing room types, rooms, etc.
    }
});
