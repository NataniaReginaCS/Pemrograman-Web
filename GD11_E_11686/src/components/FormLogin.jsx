import { useState } from "react";
import { useNavigate } from "react-router-dom";
import { Form, FloatingLabel, Button, Alert } from "react-bootstrap";
import { toast } from "sonner";
import { FiEyeOff, FiEye } from "react-icons/fi"; 

const FormLogin = () => {
	const navigate = useNavigate();
	const [user, setUser] = useState({ username: "", password: "" });
	const [type, setType] = useState("password");

	const handleToggle = () => {
		setType(type === "password" ? "text" : "password");
	};

	const handleChange = (e) => {
		const { name, value } = e.target;
		setUser({ ...user, [name]: value });
	};

	const handleSubmit = (e) => {
		e.preventDefault();
		if (user.username === "" || user.password === "") {
			toast.error("Username dan Password Tidak Boleh Kosong!");
			return;
		}
		if (
			user.password.length !== 5 ||
			user.username !== "Natania" ||
			user.password !== "11686"
		) {
			toast.error(
				"Username harus dengan nama depan dan password harus 5 digit NPM!",
			);
		} else {
			const newUser = {
				...user,
				loginAt: new Date(),
			};
			localStorage.setItem("user", JSON.stringify(newUser));
			toast.success("Login berhasil!");
			setTimeout(() => {
				navigate("/dashboard");
			}, 1000);
		}
	};

	return (
		<form onSubmit={handleSubmit} style={{ maxWidth: "700px", margin: "auto" }}>
			<Alert variant="info">
				<strong>Info!</strong> Username harus dengan nama depan dan password
				harus 5 digit NPM
			</Alert>
			<FloatingLabel
				controlId="floatingInput"
				label="Username"
				className="mb-3"
			>
				<Form.Control
					type="text"
					placeholder="name@example.com"
					name="username"
					value={user.username}
					onChange={handleChange}
				/>
			</FloatingLabel>
			<div style={{ position: "relative" }}>
				<FloatingLabel controlId="floatingPassword" label="Password">
					<Form.Control
						type={type}
						placeholder="Password"
						name="password"
						value={user.password}
						onChange={handleChange}
						autoComplete="off"
					/>
				</FloatingLabel>
				<span
					style={{
						position: "absolute",
						right: "10px",
						top: "50%",
						transform: "translateY(-50%)",
						cursor: "pointer",
					}}
					onClick={handleToggle}
				>
					{type === "password" ? <FiEyeOff size={20} /> : <FiEye size={20} />}
				</span>
			</div>
			<Button variant="primary" type="submit" className="mt-3 w-100">
				Login
			</Button>
		</form>
	);
};

export default FormLogin;
