import React, { useState, useEffect } from 'react';
import {
	Puzzle,
	CirclePlayIcon,
	CirclePauseIcon,
	CircleArrowLeft,
} from 'lucide-react';
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import './Game2.css';
import { IoReloadCircle } from 'react-icons/io5';

const Game2 = () => {
	const [imageSrc, setImageSrc] = useState('');
	const [shuffledPieces, setShuffledPieces] = useState([]);
	const [gridSize, setGridSize] = useState(3);
	const [timer, setTimer] = useState(0);
	const [isRunning, setIsRunning] = useState(false);
	const [isPaused, setIsPaused] = useState(false);
	const [isComplete, setIsComplete] = useState(false);

	const notify = (message, type = 'info') => {
		toast[type](message, {
			position: 'top-right',
			theme: 'dark',
			icon: false,
		});
	};

	useEffect(() => {
		let timerInterval;
		if (isRunning && !isPaused) {
			timerInterval = setInterval(() => setTimer((prev) => prev + 1), 1000);
		} else {
			clearInterval(timerInterval);
		}
		return () => clearInterval(timerInterval);
	}, [isRunning, isPaused]);

	useEffect(() => {
		fetchImage();
	}, []);

	useEffect(() => {
		if (imageSrc) splitImage();
	}, [imageSrc, gridSize]);

	const fetchImage = async () => {
		const response = await fetch(
			`https://picsum.photos/300/300?random=${Math.random()}`,
		);
		setImageSrc(response.url);
	};

	const startGame = () => {
		if (!isRunning || isPaused) {
			setIsPaused(false);
			setIsRunning(true);
			setIsComplete(false);
			notify('▶️ Game Started!', 'success');
		}
	};

	const pauseGame = () => {
		setIsPaused(true);
		setIsRunning(false);
		notify('⏹ Game Paused!', 'info');
	};

	const gantiGrid = () => {
		setTimer(0);
		setIsPaused(true);
		setIsRunning(false);
		splitImage();
		setIsComplete(false);
		notify('✅ Berhasil Ganti Grid Size!', 'info');
	};

	const resetGame = () => {
		fetchImage();
		setTimer(0);
		setIsPaused(true);
		setIsRunning(false);
		setIsComplete(false);
		notify('🔁 Game restarted!', 'info');
	};

	const replayGame = () => {
		setTimer(0);
		setIsPaused(false);
		setIsRunning(false);
		setIsComplete(false);
		splitImage();
		notify('🔄 Replay the game!', 'info');
	};

	const splitImage = () => {
		const pieces = [];
		const pieceSize = 300 / gridSize;
		for (let y = 0; y < gridSize; y++) {
			for (let x = 0; x < gridSize; x++) {
				pieces.push({
					id: `${y}-${x}`,
					x: x * pieceSize,
					y: y * pieceSize,
					order: y * gridSize + x,
				});
			}
		}
		setShuffledPieces(shuffleArray(pieces));
	};

	const shuffleArray = (array) => {
		for (let i = array.length - 1; i > 0; i--) {
			const j = Math.floor(Math.random() * (i + 1));
			[array[i], array[j]] = [array[j], array[i]];
		}
		return array;
	};

	const handleDragStart = (e, index) => {
		if (isPaused || !isRunning) return;
		e.dataTransfer.setData('pieceIndex', index);
	};

	const handleDrop = (e, dropIndex) => {
		if (isPaused || !isRunning) return;

		const dragIndex = e.dataTransfer.getData('pieceIndex');
		const updatedPieces = [...shuffledPieces];
		[updatedPieces[dragIndex], updatedPieces[dropIndex]] = [
			updatedPieces[dropIndex],
			updatedPieces[dragIndex],
		];
		setShuffledPieces(updatedPieces);

		if (updatedPieces.every((piece, index) => piece.order === index)) {
			setIsRunning(false);
			setIsComplete(true);
			notify('🏆🎉 Puzzle Complete!', 'success');
		}
	};

	const isPuzzleComplete = () => {
		shuffledPieces.every((piece, index) => piece.order === index);
	};

	return (
		<div className="game2-container">
			<h1 className="game2-title">
				<span style={{ paddingRight: '20px' }}>
					<Puzzle size={30} />
				</span>
				Puzzle Game
			</h1>
			<p className="game-subtitle">
				Selesaikan Puzzle dengan cara drag puzzle berikut ke dalam posisi yang
				sesuai. Tekan Start untuk memulai. Tekan Pause untuk berhenti sesaat dan
				tekan Start untuk melanjutkan permainan. Tekan Replay untuk mengulang di
				gambar yang sama. Tekan Restart untuk mengulang di gambar yang berbeda.
				Pilih grid-size yang diinginkan.
			</p>
			<div className="game2-content">
				<div className="game2-preview">
					<p className="preview-title">Preview</p>
					{imageSrc && (
						<img src={imageSrc} alt="Preview" className="game2-preview-image" />
					)}
				</div>
				<div className="game2-board-frame">
					{imageSrc && (
						<div
							className="game2-puzzle-background"
							style={{
								gridTemplateColumns: `repeat(${gridSize}, 1fr)`,
								gridTemplateRows: `repeat(${gridSize}, 1fr)`,
							}}
						>
							{shuffledPieces.map((piece, index) => (
								<div
									key={piece.id}
									className="puzzle-piece"
									draggable
									onDragStart={(e) => handleDragStart(e, index)}
									onDragOver={(e) => e.preventDefault()}
									onDrop={(e) => handleDrop(e, index)}
									style={{
										backgroundImage: `url(${imageSrc})`,
										backgroundPosition: `-${piece.x}px -${piece.y}px`,
										backgroundSize: `300px 300px`,
									}}
								></div>
							))}
						</div>
					)}
					{isPuzzleComplete() && (
						<div className="complete-message">Puzzle Complete!</div>
					)}
				</div>
			</div>
			<div className="game2-controls">
				<p>Time: {timer}s</p>
				<button
					onClick={startGame}
					className="game2-button"
					disabled={isRunning || isComplete}
				>
					<span style={{ paddingRight: '10px' }}>
						<CirclePlayIcon size={25} />
					</span>
					Start
				</button>
				<button
					onClick={pauseGame}
					className="game2-button"
					disabled={!isRunning || isPaused}
				>
					<span style={{ paddingRight: '10px' }}>
						<CirclePauseIcon size={25} />
					</span>
					Pause
				</button>
				<button onClick={replayGame} className="game2-button">
					<span style={{ paddingRight: '10px' }}>
						<CircleArrowLeft size={25} />
					</span>
					Replay
				</button>
				<button onClick={resetGame} className="game2-button">
					<span style={{ paddingRight: '10px' }}>
						<IoReloadCircle size={25} />
					</span>
					Restart
				</button>
				<div>
					<select
						onChange={(e) => {
							setGridSize(parseInt(e.target.value));
							gantiGrid();
						}}
						value={gridSize}
					>
						value={gridSize}
						<option value="3">3 x 3</option>
						<option value="4">4 x 4</option>
						<option value="5">5 x 5</option>
					</select>
				</div>
			</div>
		</div>
	);
};

export default Game2;
