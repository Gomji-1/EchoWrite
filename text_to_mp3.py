from gtts import gTTS
import sys

def text_to_mp3(text, mp3_file_path, language='en'):
    tts = gTTS(text=text, lang=language, slow=False)
    tts.save(mp3_file_path)
    print(f"MP3 file saved as {mp3_file_path}")

if __name__ == "__main__":
    text = sys.argv[1]
    mp3_file_path = sys.argv[2]
    text_to_mp3(text, mp3_file_path)
