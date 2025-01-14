import React, { useState } from 'react';
import { Dice6Icon, RefreshCcw, Target } from 'lucide-react';
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import './Game1.css';

const Game1 = () => {
	const [angka, setAngka] = useState('');
	const [strength, setStrength] = useState(0);
	const [desc, setDesc] = useState('');
	const [hasilGame, setHasilGame] = useState(false);
	const [tebakAngka, setTebakAngka] = useState(
		Math.floor(Math.random() * 10) + 1,
	);
	const [kesempatan, setKesempatan] = useState(4);

	const notify = (message, info) => {
		if (info === 'error') {
			toast.warning(message, {
				position: 'top-right',
				theme: 'dark',
			});
		} else if (info === 'success') {
			toast.success(message, {
				position: 'top-right',
				theme: 'dark',
				icon: false,
			});
		} else {
			toast.success(message, {
				position: 'top-right',
				theme: 'dark',
				icon: false,
			});
		}
	};

	const handleSubmit = () => {
		if (angka === '' || angka < 1 || angka > 10) {
			notify('🎯 Masukkan angka antara 1 dan 10', 'error');
			setDesc('');
			return;
		} else if (angka < tebakAngka) {
			setDesc('⭣ Terlalu rendah!');
			setKesempatan((prev) => prev - 1);
		} else if (angka > tebakAngka) {
			setDesc('⭡ Terlalu tinggi!');
			setKesempatan((prev) => prev - 1);
		} else {
			notify('🏆🎉 Berhasil mencetak angka!', 'success');
			setDesc('Berhasil!');
			setHasilGame(true);
		}

		if (kesempatan === 1) {
			setHasilGame(true);
			notify('😢 💔 Gagal menebak angka!');
		}
	};

	const textDisableHandler = (event) => {
		const value = event.target.value;
		setAngka(value);

		setStrength(Math.min(4, Math.ceil(value.length / 2)));
	};

	const handleReset = () => {
		setAngka('');
		setStrength(0);
		setKesempatan(4);
		setDesc('');
		setHasilGame(false);
		setTebakAngka(Math.floor(Math.random() * 10) + 1);
	};

	return (
		<div className="game1-container">
			<h1 className="game1-title">
				<span style={{ paddingRight: '20px' }}>
					<Dice6Icon size={30} />
				</span>
				Tebak Angka
			</h1>
			<p className="game-subtitle">Tebak angka dari 1 sampai 10 dalam 4 coba</p>
			<div className="game-form">
				<h5 style={{ textAlign: 'center' }}>
					<Target
						size={25}
						style={{ paddingRight: '5px', paddingBottom: '5px' }}
						color="#22d3ee"
					/>
					Masukkan Angka
				</h5>
				<div className="strength-bar" style={{ marginTop: '1rem' }}>
					{[...Array(4)].map((_, index) => (
						<div
							key={index}
							className={`circle ${index < 4 - kesempatan ? 'salah' : 'active'}`}
						/>
					))}
				</div>

				<input
					type="number"
					className="game-input"
					value={angka}
					onChange={textDisableHandler}
					required
					placeholder="1 - 10"
					style={{ textAlign: 'center', marginTop: '3rem' }}
				/>
				<div style={{ textAlign: 'center' }}>
					<button
						type="button"
						className={`game-submit-btn ${hasilGame ? 'false' : 'true'}`}
						onClick={hasilGame ? handleReset : handleSubmit}
					>
						{hasilGame ? (
							<>
								<RefreshCcw
									size={25}
									style={{ paddingRight: '5px', paddingBottom: '5px' }}
								/>
								Coba Lagi
							</>
						) : (
							<>
								<Target
									size={25}
									style={{ paddingRight: '5px', paddingBottom: '5px' }}
								/>
								Tebak Angka
							</>
						)}
					</button>
				</div>
				<div className="game-desc">
					{desc && (
						<p
							className={`game-desc ${desc === 'Berhasil!' ? 'benar' : 'salah'}`}
							style={{
								marginTop: '0.5rem',
								fontSize: '100%',
								color: '#ffffff77',
								fontWeight: 'bold',
							}}
						>
							{desc}
						</p>
					)}
					<p
						className="game-subtitle"
						style={{
							fontSize: '90%',
						}}
					>
						{`Kesempatan tersisa: ${kesempatan}`}
					</p>
				</div>
			</div>
		</div>
	);
};

export default Game1;
