15:44:44 CREATE TABLE myelo.lol_summoner
         (
         summonerId int NOT NULL,
         summonerName VARCHAR(30) NOT NULL,
         iconId int NOT NULL
         );
15:44:44 ALTER TABLE myelo.lol_summoner ADD CONSTRAINT unique_summonerId UNIQUE (summonerId);

CREATE TABLE myelo.lol_matches
      (
      matchId int NOT NULL,
      queueType VARCHAR(25) NOT NULL,
      matchDuration int NOT NULL,
      matchCreation int NOT NULL,
      championId int NOT NULL,
      teamId int NOT NULL,
      spell1 int NOT NULL,
      spell2 int NOT NULL
      );
      ALTER TABLE lol_matches ADD CONSTRAINT unique_matchId UNIQUE (matchId);