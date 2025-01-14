import useAxios from ".";

// Mendapatkan semua komentar untuk ditaruh di halaman dashboard
export const GetAllKomentar = async () => {
	try {
		const response = await useAxios.get("/komentar", {
			headers: {
				"Content-Type": "application/json",
				Authorization: `Bearer ${sessionStorage.getItem("token")}`,
			},
		});
		return response.data.data;
	} catch (error) {
		throw error.response.data;
	}
};

// Mendapatkan semua komentar dari content
export const GetKomentarByContent = async (contentId) => {
	try {
		const response = await useAxios.get(`/contents/${contentId}/komentar`, {
			headers: {
				"Content-Type": "application/json",
				Authorization: `Bearer ${sessionStorage.getItem("token")}`,
			},
		});
		return response.data;
	} catch (error) {
		throw error.response ? error.response.data : error;
	}
};

// [Tidak dipakai] Mendapatkan Komentar by id
export const GetKomentarById = async (id) => {
	try {
		const response = await useAxios.get(`/komentar/${id}`, {
			headers: {
				"Content-Type": "application/json",
				Authorization: `Bearer ${sessionStorage.getItem("token")}`,
			},
		});
		return response.data.data;
	} catch (error) {
		throw error.response.data;
	}
};

export const CreateKomentar = async (contentId, data) => {
	try {
		const response = await useAxios.post(
			`/contents/${contentId}/komentar`,
			data,
			{
				// Sesuaikan URL
				headers: {
					"Content-Type": "application/json",
					Authorization: `Bearer ${sessionStorage.getItem("token")}`,
				},
			},
		);
		return response.data;
	} catch (error) {
		throw error.response.data;
	}
};

// Mengedit Komentar
export const UpdateKomentar = async (values) => {
	try {
		const response = await useAxios.put(`/komentar/${values.id}`, values, {
			headers: {
				"Content-Type": "application/json",
				Authorization: `Bearer ${sessionStorage.getItem("token")}`,
			},
		});
		return response.data;
	} catch (error) {
		throw error.response.data;
	}
};

// Menghapus komentar
export const DeleteKomentar = async (id) => {
	await new Promise((resolve) => setTimeout(resolve, 1000));
	try {
		const response = await useAxios.delete(`/komentar/${id}`, {
			headers: {
				"Content-Type": "application/json",
				Authorization: `Bearer ${sessionStorage.getItem("token")}`,
			},
		});
		return response.data;
	} catch (error) {
		throw error.response.data;
	}
};
