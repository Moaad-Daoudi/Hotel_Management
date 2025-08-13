import api from '@/services/api';

class HotelSetupApiService {
    // === Staff Management ===
    fetchStaff(filters) {
        // Logic: GET from '/api/back-office/hotel-setup/staff' with filters.
        return api.get('/back-office/hotel-setup/staff', { params: filters });
    }
    createStaff(staffData) {
        // Logic: POST to '/api/back-office/hotel-setup/staff' with staffData.
        return api.post('/back-office/hotel-setup/staff', staffData);
    }
    updateStaff(staffId, staffData) {
        // Logic: PUT to `/api/back-office/hotel-setup/staff/${staffId}` with staffData.
        return api.put(`/api/back-office/hotel-setup/staff/${staffId}`, staffData);
    }

    // === Room Type Management ===
    fetchRoomTypes(hotelId) {
        // Logic: GET from `/api/back-office/hotel-setup/hotels/${hotelId}/room-types`.
        return api.get(`/api/back-office/hotel-setup/hotels/${hotelId}/room-types`);
    }
    createRoomType(hotelId, roomTypeData) {
        // Logic: POST to `/api/back-office/hotel-setup/hotels/${hotelId}/room-types` with roomTypeData.
        return api.post(`/api/back-office/hotel-setup/hotels/${hotelId}/room-types`, roomTypeData);
    }
    // ... other methods for updating room types, rooms, settings, etc.
}

export default new HotelSetupApiService();
