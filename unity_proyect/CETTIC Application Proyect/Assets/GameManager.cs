using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class GameManager : MonoBehaviour {

    public int jumpSpeed;
    public int playerSpeed;
    public int scoreValue;
    public int gameTime;

    public int webPlayerSpeed;
    public int webScoreValue;
    public int webGameTime;
    
    public int score;

    public UnityEngine.UI.Text scoreUI;


    public GameStates gameState;

    public enum GameStates
    {
        Login, Game, Pause, GameOver
    }

	void Start () {
        DontDestroyOnLoad(this.gameObject);
	}
	
	void Update () {
        
        switch (gameState)
        {
            case GameStates.Login:
                break;
            case GameStates.Game:
                if (scoreUI == null)
                {
                    scoreUI = GameObject.Find("Score").GetComponent<UnityEngine.UI.Text>();
                }
                Time.timeScale = 1;
                scoreUI.text = "Score: " + score;
                break;
            case GameStates.Pause:
                Time.timeScale = 0;
                break;
            case GameStates.GameOver:
                Time.timeScale = 0;
                break;
            default:
                break;
        }
        
	}

    public void AddScore(PickupScript.PickupType pickupFactor)
    {
        score += (scoreValue * (int)pickupFactor);
    }
}
